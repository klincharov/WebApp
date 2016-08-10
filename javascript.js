
	function openWin(id)
	{	
		$.ajax({
    		url:'/webdev/project/img/' + id +'.jpg',
    		type:'HEAD',

    		error: function()
    		{
    			//Date() to request 'different' resource every time, thus without cache
    			window.open('\img/'+ id + '.jpg?dt='+ Date().toString(),'','width=300,height=200,scrollbars=no,resizable=no');

    		},
    		success: function()
    		{
       		 	window.open('\img/'+ id +'.jpg?dt='+ Date().toString(),'','width=300,height=200,scrollbars=no,resizable=no'); 

				$.ajax({
					url: "update.php", 
					data: {"id" : id},
					type: "POST",

					success: function(data){
						console.log("reply: " + data)
						location.reload(true);
					}

				});
    		}
		});	
		

			//troubleshooting
		console.log(id + ".jpg");
			


		}

	function archivePic(id)
	{
			$.ajax({
			url: "archive.php", 
			data: {"id" : id},
			type: "POST",

			success: function(data){
				console.log("reply: " + data)
				//location.reload(true);
				}

			});

	}

