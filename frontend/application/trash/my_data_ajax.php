 <script type="text/javascript" src="/static/js/jquery-ui-1.8.13/js/jquery-1.5.1.min.js"></script>

<div id="content">
<?
foreach($results as $value){
    echo $value->name."<br>";
}

?>
<div id="page">
<?

echo $page;
?>
</div>
</div> 




<script>
$('#page a').click(function(){
        var page = $(this).attr('href');
        console.log(page);
        $('#content').load(page);
        return false;
})
</script>
