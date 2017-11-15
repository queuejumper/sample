$(function(){
	if($('.projects').find('.project-row:last').length)
	{
		var clonedRow = $('.projects').find('.project-row:last').clone();	
	}
	else
	{
		$('.search-btn').off('click');
	}
	$('.search-btn').on('click',function(){
		var url = '/search',
			keyWord = $('.search_box').find("input[name=keyWord]").val(),
			country =  $('.countriesList').find(":selected").attr('value'),
			status = $('.statusList').find(":selected").attr('value'),
			needs =[],
			type = 'get',
			data = {};

			$('.statusCheckbox').find('input:checked').each(function(){
				needs.push($(this).attr('value'));
			});

				data["keyWord"] = keyWord;
				
			if(country && country.trim() != '')
				data["country"] = country;
			if(needs && needs.length > 0)
				data["needs"] = needs.toString();
			if(status && status.trim() != '')
				data["status"] = status;

		AJAX(url,type,data,function(){

		},function(response){
			if(response.status == 'success')
			{
				$('.projects').empty();
				$.each(response.data, function(key,value){
					$('.projects').append(clonedRow);
					$('.projects').find('img:last').attr('src',value.image);
					$('.projects').find('.type:last').html(value.type);
					$('.project-info:last').find('#name').html(value.name);
					$('.project-info:last').find('#description p').html(
						'<p id="description">'
						+value.description
						+'<a href="/single-project/'+value.project_id+'">'
						+'</a></p>');
					$('.project-info:last').find('.country').html(value.country);
					clonedRow = $('.projects').find('.project-row:last').clone();
				});
			}else
			{
				$('.projects').empty();
				$('.projects').append('<h4>لا يوجد نتائج</h4>')
			}
		}, function(qr,err){
			//ERROR MESSAGE
		});

	});
});



function AJAX(url, type, data, before,callback,err){
		 $.ajax({
	        url: url,
	        type: type,
	        data: data,
	        dataType: 'json',
	        beforeSend: before,
	    }).done(callback)
		 .fail(err);
}