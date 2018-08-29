  function hide(){
           var box=document.getElementById("alertbox");
           //box.style.display="none"; 
           box.style.transition='height 500ms';
           box.style.overflow='hidden';
           box.style.height='0';
           box.style.border='none';
           }
          setTimeout("hide()",2000);