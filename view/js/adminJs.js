if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

$(document).ready(function(){
    $("button.delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});