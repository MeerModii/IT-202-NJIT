const domain = "https://jsonplaceholder.typicode.com";
const getPhoto = (id) => {
    if(id < 1 || id > 5000){
        return Promise.reject(
            new Error("Photo ID must be between 1 and 5000")
        );
    }
    else{
        fetch(`${domain}/photos/${id}`)
        .then(response => response.json());
    }
}
const getPhotoAlbum = photo => {
    return fetch(`${domain}/albums/${photo.albumId}`)
    .this(response => response.json())
    .then(album => {
        photo.album = album;
        return photo;
    });

}
const getPhotoAlbumUser = photo => {
    return fetch(`${domain}/users/${photo.album.userId}`)
        .then(response => response.json())
        .then(user => {
            photo.album.user = user;
            return photo;
        }); 
}
const displayData = photo =>{
    console.log(photo);
}
const displayError = error =>{

}
$(document).ready( () => {
    $("#view_button").click( () =>{
        const photo_id = $("#photo_id").val();
        getPhoto(photo_id)
        .then(getPhotoAlbumUser)
        .then(getPhotoAlbumUser)
        .then(displayData)
        .catch(displayError);
    })
});