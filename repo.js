window.onload=function(){

var links=document.getElementById("tab-container").getElementsByTagName("a");
var current=window.location.href;
var found=0,len;
len=current.length;

for (var i = len-1; i>=0 ; i--)
{
    if(current.charAt(i)=='/')break;
}
current=current.slice(i+1);

for (var i = 0; i < links.length; i++) {
if(current==links[i].getAttribute("href")){found=1;break;}
}
var d=(document.getElementById(links[i].getAttribute("id")).parentNode);
d.classList.add("selected");
}
