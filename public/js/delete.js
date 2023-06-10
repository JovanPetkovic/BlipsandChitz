var xmlHttp = new XMLHttpRequest();
var items;
setTimeout(itemsSetup, 500);


function contentDelete(e, item){
    e.preventDefault();
    if(xmlHttp==null){
        alert("Browser ne podrzava XMLHttpRequest");
        return;
    }
    var formData = new FormData(item);
    formData.append('delete',true);
    var output = document.querySelector("#output");
    xmlHttp.open("POST", "/BlipsandChitz/item", true);
    xmlHttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xmlHttp.send(formData);
    xmlHttp.onreadystatechange = function()
    {
        if(this.readyState !== 4) return;
        output.style.visibility = "visible";
        if(xmlHttp.readyState === XMLHttpRequest.DONE && xmlHttp.status === 200)
        {
            output.querySelector("#succ").style.display = "block";
            item.remove();
        }
        else
        {
            output.querySelector("#fail").style.display = "block";
        }
        setTimeout(function(){
            output.style.visibility = "hidden";
            output.querySelector("#succ").style = "";
            output.querySelector("#fail").style = "";
        },1000);
    }

}

function itemsSetup(){
    items = document.querySelectorAll(".item");
    items.forEach(function(item){
        item.querySelector('.delete').addEventListener('click', function(event){
            contentDelete(event,item);
        });
    })
}