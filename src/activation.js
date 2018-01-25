

if(this.location.pathname === "/")
{
	$('a[href="../index.php"]').addClass('active');
	
}
else{

$('a[href="..' + this.location.pathname + '"]').addClass('active');

}