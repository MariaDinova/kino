<?php
namespace controller;

use model\dao\HallsDao;
class HallsController {
    /**
     * Check if is set cinema id.
     *  - If is set - get all halls for the chosen cinema from HallsDao.
     *         If result is NULL, there is not cinema with this id in db
     *  - If cinema id is not set take all halls from db
     * Call - smartyTemplate - hallsList.tpl
     *
     * @return void
     */
    public function listAll(){
        $msg = "";
        if(isset($_GET["cinema"])){
            $cinema=$_GET["cinema"];
            $allHalls = HallsDao::getByCinema($cinema);
            if($allHalls == NULL){
                $msg .="Това кино не е намерено";
            }
        }
        else {
            $allHalls = HallsDao::getAll();
        }
        $GLOBALS["smarty"]->assign('msg', $msg);
        $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
        $GLOBALS["smarty"]->assign('halls', $allHalls);
        $GLOBALS["smarty"]->display('hallsList.tpl');
    }
}

