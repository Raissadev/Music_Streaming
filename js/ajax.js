idValue = document.querySelectorAll('input[name=id-value]');

idValue.forEach((ckeckbox) => {
ckeckbox.addEventListener('change', (e) =>{
e.preventDefault();
console.log(e.target.value);
let xhr = new XMLHttpRequest();

xhr.open('GET','http://localhost/App/Models/Ajax.php?id='+e.target.value,true);

    xhr.onreadystatechange = () => {
      if(xhr.readyState == 4){
        if(xhr.status == 200){
          document.getElementById('box-song').innerHTML = xhr.response;
        }
      }
    }
    xhr.send(xhr);


  });
});
