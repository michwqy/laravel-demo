  function hide(){
           var box=document.getElementById("alertbox");
           //box.style.display="none"; 
           box.style.transition='height 500ms';
           box.style.overflow='hidden';
           box.style.height='0';
           box.style.border='none';
           }
          setTimeout("hide()",2000);

    const changeStyle = (data) => {
            //一行核心代码即可实现基本编辑器功能
            data.value? document.execCommand(data.command, false, data.value):document.execCommand(data.command, false, null)
          }

    function submit(){
           var div=document.getElementsByClassName("textarea")[0];
           var input=document.getElementById("contentinput");
           input.value=div.innerHTML;
           input.value=input.value.replace(/[\r\n]/g,"");
           input.value=input.value.replace(/\ +/g,"");  
           var title=document.getElementsByClassName("titleinput")[0];
           var form=document.getElementById("newarticle");
           if(!(input.value==""||title.value=="")){
             form.submit();
           }
    }