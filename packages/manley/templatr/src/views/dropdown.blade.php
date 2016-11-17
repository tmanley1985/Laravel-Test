<ul class="dropdown">

	@foreach($dropdown as $links)

		<li>
		
			<a href="{{$links["main"]["href"]}}" >{{$links["main"]["text"]}}</a>
			
			<ul>
				@foreach($links["dropdown"] as $sub_link)

					<li>
						<a href="{{$sub_link["href"]}}" title="">{{$sub_link["text"]}}</a>
					</li>

				@endforeach
			</ul>
		</li>
	@endforeach
</ul>