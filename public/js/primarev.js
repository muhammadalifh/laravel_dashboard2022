document.getElementById('whats-chat').addEventListener("mouseover", showchatbox);
document.getElementById('chat-top-right').addEventListener("click", closechatbox);
document.getElementById('send-btn').addEventListener("click", sendmsg);
window.addEventListener("load", showchatboxtime);
function showchatbox(){
document.getElementById('chat-box').style.right='8%'
}
function closechatbox(){
document.getElementById('chat-box').style.right='-500px'


}
function showchatboxtime(){
setTimeout(launchbox,5000)
}
function launchbox(){
document.getElementById('chat-box').style.right='8%'

}
function sendmsg(){
var msg = document.getElementById('whats-in').value;
var relmsg = msg.replace(/ /g,"%20");
 window.open('https://api.whatsapp.com/send?phone=+6285363965992&text='+relmsg,'_blank');
}
