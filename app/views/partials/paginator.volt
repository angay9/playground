{% if collection.total_pages > 0 %}
	<div class="text-center">
		<ul class="pagination text-center pagination-sm">
			<li>
				<a href="{{ route ~ '/' ~ 1 }}">&laquo;</a>
			</li>
			{% for link in 1..collection.total_pages %}
				{% if link == collection.current  %}
					<li {{ 'class="active"'}} >
						<span>{{ link }}</span>
					</li>
				{% else %}
					<li>
						<a href="{{ route ~ '/' ~ link }}">{{ link }}</a>
					</li>
				{% endif %}
				
			{% endfor %}
			<li>
				<a href="{{ route ~ '/' ~ collection.last }}">&raquo;</a>
			</li>
		</ul>	
	</div>
{% endif %}