
class Introduction{
constructor(){
document.getElementById("intro").style.visibility="hidden";
document.getElementById("oeil").addEventListener('click', this.cliquerOeil.bind(this));
document.getElementById("intro").addEventListener('click', this.cliquerIntro.bind(this));

}
cliquerOeil(){
    document.getElementById("oeil").style.visibility="hidden";
    document.getElementById("intro").style.visibility="visible";
}
cliquerIntro(){
    document.getElementById("intro").style.visibility="hidden";
    document.getElementById("oeil").style.visibility="visible";

}
}
var intro=new Introduction();