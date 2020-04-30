let btnadd=document.querySelector('#add');
				let input=document.querySelector('input');
				btnadd.addEventListener('click',()=>{
	input.value=parseInt(input.value,10)+1;
});