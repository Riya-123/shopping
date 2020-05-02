let btnSubtract=document.querySelector('#substract');
btnSubtract.addEventListener('click',e=>{
	const productId = e.target.attributes.name
	let input=document.querySelector('#'+productId);
	input.value=parseInt(input.value,10)-1;
});	

let btndd=document.querySelector('.add-cart');
btndd.addEventListener('click',()=>{
	const productId = e.target.attributes.name
	let input=document.querySelector('#'+productId);
	input.value=parseInt(input.value,10)+1;
});

