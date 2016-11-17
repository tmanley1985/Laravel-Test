<div class="container">
	<table class="table">
		<tbody>
		    <tr>
			    @foreach($columns as $column)
			    	<th>{{$column}}</th>
				@endforeach
			</tr>

			@foreach($rows as $row)

				<tr>
					@foreach($row as $data)
						<td>{{$data}}</td>
					@endforeach
				</tr>
			@endforeach
		</tbody>
	</table>
</div>		