function show_del_btn(){
    var checkBox = document.getElementById("edit_btn");
    var photo = document.getElementsByClassName("del_photo");
    var album = document.getElementsByClassName("del_album");
    var i;

    if (checkBox.checked == true){
        
        for(i=0;i<photo.length;i++){
            photo[i].style.display="unset";
        }
        for(i=0;i<album.length;i++){
            album[i].style.display="unset";
        }
        
    }else{
        for(i=0;i<photo.length;i++){
            photo[i].style.display="none";
        }
        for(i=0;i<album.length;i++){
            album[i].style.display="none";
        }
        
    }
}