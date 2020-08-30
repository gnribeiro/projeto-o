<?php if($show_menu):?>
<div id="menu_container">
	<div id="menu_content">
        <div id="jstree"></div>
        <script type="text/javascript">
            $(function () {
                $("#jstree").jstree({
                    "themes" : {
                                "theme": "admin"
                            },
                    "json_data" :
                        {
                            "data":<?php echo  $tree_menu ?>,
                            "ajax" : {
                                        "url" : function(n)
                                                { 
                                                    return "/bo/category/tree_ajax/" + n.attr('id');
                                                }
                                    },
                            "progressive_render" : true
                        },
                    "plugins" : [ "themes", "json_data" ]
                })
           

                $('#menu_container').scrollTo($('#<?php echo Request::instance()->param('id') ?>'));
           
            });
    
            </script>
		</div>
	</div>
<?php endif?>
