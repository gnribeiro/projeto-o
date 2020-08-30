<?php if($show_menu):?>



<div class="menu" style="border:1px solid #cccccc; float:left;">
	<div class="menu_container">
		<div class="menu_content">

		    <div id="demo1" class="demo"></div>
                <script type="text/javascript" class="source">
                $(function () {
                $("#demo1").jstree(
                {
                 "ui" : {
                        "selected_parent_close" : false,
                        "select_limit" : 2,
                        "select_multiple_modifier" : "alt",
                        "selected_parent_close" : "select_parent",
                        "initially_select" : [<?php echo $tree_id ?>]

                    },

                "json_data" :
                    {
                        "data":<?php echo  $tree_menu ?>,
                    },

                "plugins" : [ "themes", "json_data"   ]
                })

            $("#demo1").jstree("open_node","<?php echo $tree_path?>");

            });
            </script>

		</div>
	</div>

	<div class="menu_bottom"></div>
</div>

<?php endif ?>
