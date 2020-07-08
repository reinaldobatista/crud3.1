(function(win,doc){
    'use strict'
    function confirmDel(event)
    {
        event.preventDefault();
        //console.log(event.target.parentNode.action);
        let token=doc.getElementsByName("_token")[0].value;
        if(confirm(" Deseja mesmo apagar?"))
        {
           let ajax=new XMLHttpRequest();
           ajax.open("DELETE",event.target.parentNode.action);
           ajax.setRequestHeader('X-CSRF-TOKEN',token);
           ajax.onreadystatechange=function ()
           {
                if(ajax.readyState === 4 && ajax.status === 200)
                {
                    win.location.href="products";
                    //console.log('Deu certo!');
                   //win.location.action="{{route("delete.destroy")}}";
                }
           }

        }
        else
        {
            return false;
        }

    }
    if(doc.querySelector('btn-danger')){
        let btn=doc.querySelectorAll('btn-danger');
        for(let i=0; i<btn.length; i++)
        {
            btn[i].addEventListener('click',confirmDel,false);
        }
    }
})(window,document);
