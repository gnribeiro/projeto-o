<script type="text/javascript" src="/static/js/prototype.js"></script>
<div id="content">
<?
$config['first_link'] = 'First';
$config['div'] = 'content'; //Div tag id
$config['base_url'] = 'index.php/my_data_page';
$config['total_rows'] = $getTotalData;
$config['per_page'] = $perPage;
$config['postVar'] = 'page';

$this->ajax_pagination->initialize($config);
print $this->ajax_pagination->create_links();
//PRINT TABLE
print $this->table->generate($makeColums);
?>
</div> 
