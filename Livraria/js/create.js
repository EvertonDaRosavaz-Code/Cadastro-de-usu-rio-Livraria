function Campo(p){
   let campo = document.getElementsByTagName('input')[p];
   let styleLabel = campo.parentElement.lastElementChild.style;
   if(campo.value != ""){
        styleLabel.fontSize ="11px";
        styleLabel.top = "-5px";
        styleLabel.color = "#ffff";
   }
   else{
        styleLabel.fontSize ="16px";
        styleLabel.top = "16px";
        styleLabel.color = "#323232";
        styleLabel.left = "5px"
   }
}