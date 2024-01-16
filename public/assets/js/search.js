var search = function(){
    var inputSearch = document.getElementById('searchInput').value;     
    var reponse = new XMLHttpRequest();
    reponse.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("MyDiv").innerHTML = reponse.responseText;
        }
    }
    reponse.open("GET" , "?route=search&titre=" + inputSearch , true);
    reponse.send();
}