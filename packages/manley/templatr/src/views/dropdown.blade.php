<ul class="tr-{{$classList}}">

	@foreach($dropdown as $links)

		<li class="tr-dropdown__item">
		
			<a class="tr-dropdown__show" href="{{$links["main"]["href"]}}" >{{$links["main"]["text"]}}</a>
			<div class="tr-dropdown__list--container">
				<ul class="tr-dropdown__list">
					@foreach($links["dropdown"] as $sub_link)

						<li>
							<a href="{{$sub_link["href"]}}" title="">{{$sub_link["text"]}}</a>
						</li>

					@endforeach
				</ul>	
			</div>
			
		</li>
	@endforeach
</ul>