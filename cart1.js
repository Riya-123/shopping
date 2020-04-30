
let btndd=document.querySelector('#add');
	let btnSubtract=document.querySelector('#substract');
	let input=document.querySelector('input');
	btnSubtract.addEventListener('click',()=>{
	input.value=parseInt(input.value,10)-1;
});	


btndd.addEventListener('click',()=>{
	input.value=parseInt(input.value,10)+1;
});

