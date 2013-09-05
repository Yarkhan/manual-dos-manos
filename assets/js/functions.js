
//Event Listeners
$('body').on('click',function(e){
	if(e.toElement.tagName == "A" && e.toElement.hostname == document.location.hostname){
		console.log(e);
		e.preventDefault();
		location.href="#!"+e.toElement.href.split('/').pop();
		search(e.toElement.href.split('/').pop());
	}
});
$('#search_form').on('submit',function(e){
	e.preventDefault();
	search($('#search_term').val());
});
window.onhashchange = function(e){
	search(e.newURL.replace('#!','').split('/').pop());
	e.preventDefault();
}
//


/**
 * AJAX request to search.php
 * uses process_search() when done.
 * 
 */
function search(val){
	if(val.length < 4)
	{
		process_search('Too much results!.');
		return;
	}
	$.get('search.php',{'val':val})
		.done(function(data){
			process_search(data);
		})
		.error(function(){
			process_search('Aconteceu alguma coisa, dá uma olhadinha aí no console, fera.');
			console.log(this);
		});
}

/**
 * Write @data into #manpage
 * Fill link list #search_result if @data is JSON
 */
function process_search(data){
	$('#search_results').html('');
	if(obj = parse_json(data))
	{
		for(var i=0; i<obj.length;i++)
		{
			$('#search_results').append(
				'<a href="'+obj[i]+'">'+obj[i].replace('docs/','')+'</a><br>'
			);		
		}
	}else{
		$('#manpage').html(data);
	}
}

/**
 * Parses JSON.
 * returns false on invalid/broken JSON or
 * object on success
 */
function parse_json(str)
{
	try{
		obj = JSON.parse(str);
	}catch(e){
		return false;
	}
	return obj;
}