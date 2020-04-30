<script>let btnadd=document.querySelector('#add');
	let btnSubtract=document.querySelector('#subtract');
	let input=document.querySelector('input');
	btnSubtract.addEventListener('click',()=>{
	input.value=parseInt(input.value,10)-1;
});	


btnadd.addEventListener('click',()=>{
	input.value=parseInt(input.value,10)+1;
});
</script>
