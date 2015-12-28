	$(document).ready(function() {
 
		$('.edit').editable('updatenotetext.php', { 
			event: 'dblclick', 
			type : 'textarea',
			submit : 'Save',
			height : 90,
			width : 110
				});

		$('.editlabel').editable('updatelabeltext.php', { 
			event: 'dblclick', 
			type : 'text',
			width:  150,
			submit : 'Save'
				});

		$(".bar").draggable({ 
			containment: '#board', 
			scroll: false,
			cursor: 'col-resize'

	 		}).mouseup(function(){ 
			var coords=[];
			var coord = $(this).position();
			var currentId = $(this).attr('id');
			
			var item={currentId: currentId, coordLeft: Math.round(coord.left)  };

		   	coords.push(item);
			var order = { coords: coords };
			$.post('updatebarpos.php', 'data='+$.toJSON(order), function(response){
				if(response == "success")
						$("#respond").html('<div class="success">X and Y Coordinates Saved!</div>').hide().fadeIn(500);
						setTimeout(function(){ $('#respond').fadeOut(500); }, 500);
						});	
			});

		$(".bar").dblclick(function() { 

			var barId = $(this).attr('id');

			var promptUser = confirm ("Remove Bar?")
			if (promptUser) {	
				$.post('delbar.php', { barId: barId });
				$(this).remove();}			
			});
			

		$(".label").draggable({ 
			containment: '#board', 
			scroll: false,
			opacity: 0.6,

	 	}).mouseup(function(){ 
			var coords=[];
			var coord = $(this).position();
			var currentId = $(this).attr('id');
			
			var item={currentId: currentId, coordTop: Math.round(coord.left), coordLeft: Math.round(coord.top)  };

		   	coords.push(item);
			var order = { coords: coords };
			$.post('updatelabelpos.php', 'data='+$.toJSON(order), function(response){
				if(response == "success")
						$("#respond").html('<div class="success">X and Y Coordinates Saved!</div>').hide().fadeIn(500);
						setTimeout(function(){ $('#respond').fadeOut(500); }, 500);
					});	
			});
		
		$(".note").draggable({ 
				containment: '#board', 
				scroll: false,
				opacity: 0.6,
		 	}).mouseup(function(){ 
				var coords=[];
				var coord = $(this).position();
				var currentId = $(this).attr('id');
				var item={currentId: currentId, coordTop: Math.round(coord.left), coordLeft: Math.round(coord.top)};
			   	coords.push(item);
				var order = { coords: coords };
				$.post('updatenotepos.php', 'data='+$.toJSON(order), function(response){
					if(response == "success")
							$("#respond").html('<div class="success">X and Y Coordinates Saved!</div>').hide().fadeIn(500);
							setTimeout(function(){ $('#respond').fadeOut(500); }, 500);
						});	

			});

		/*  Cycle color on right click */
		$(".note").mousedown(function(e) {
		    if (e.which === 3) {
		    	var currentClass = $(this).attr('class');
		    	var currentId = $(this).attr('id');	

		    	if (currentClass.search("yellow")>-1)
		    	{ 
					$.post('updatecolor.php',{ color:"cyan",id:currentId });
				   	$(this).switchClass( "yellow", "cyan", 0 ); 
			    }

		    	if (currentClass.search("cyan")>-1)
		    	{ 
		    		$.post('updatecolor.php',{ color:"green",id:currentId });
			    	$(this).switchClass( "cyan", "green", 0 ); 
			    }

		    	if (currentClass.search("green")>-1)
		    	{ 
		    		$.post('updatecolor.php',{ color:"purple",id:currentId });
			    	$(this).switchClass( "green", "purple", 0 ); 
			    }

		    	if (currentClass.search("purple")>-1)
		    	{ 
		    		$.post('updatecolor.php',{ color:"pink",id:currentId });
			    	$(this).switchClass( "purple", "pink", 0 ); 
			    }

		    	if (currentClass.search("pink")>-1)
		    	{ 
		    		$.post('updatecolor.php',{ color:"yellow",id:currentId });
			    	$(this).switchClass( "pink", "yellow", 0 ); 
			    }
		    	
		    	//alert($(this).attr('class'));
		    }
		});


		/*  Disable Default Right Click options*/
		$(function() {
            $(this).bind("contextmenu", function(e) {
                e.preventDefault();
            });
        }); 
				

		$('#help').click(function() {
			$("#helpbox").modal({
				opacity:50,
				overlayCss: {backgroundColor:"#333"}
			});		
		});
		
			
		
		//$(".up").click(function () {
		//	var zindex = parseInt($(this).parent().css("z-index"));
		//	zindex++;
		//	var saveindex={zindex: zindex};
		//	$(this).parent().css('z-index', 'zindex');

		//	$.post('zindexup.php', 'data='+$.toJSON(saveindex), function(response){
		//		if(response == "success")
		//				$("#respond").html('<div class="success">Z-index adjusted</div>').hide().fadeIn(500);
		//				setTimeout(function(){ $('#respond').fadeOut(500); }, 500);
		//			});	
		//	});
					

		// $( "#trash" ).droppable({
		//	drop: function( event, ui ) {
		//		$(ui.draggable).attr("id");				
		//		var draggedId = $(ui.draggable).attr('id');
		//		var draggedClass = $(ui.draggable).attr('class');
		//		alert("hhh");
		//	}
		// });
		

		
		});