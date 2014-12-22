<?php if ($collection->total_pages > 0) { ?>
	<div class="text-center">
		<ul class="pagination text-center pagination-sm">
			<li>
				<a href="<?php echo $route . '/' . 1; ?>">&laquo;</a>
			</li>
			<?php foreach (range(1, $collection->total_pages) as $link) { ?>
				<?php if ($link == $collection->current) { ?>
					<li <?php echo 'class="active"'; ?> >
						<span><?php echo $link; ?></span>
					</li>
				<?php } else { ?>
					<li>
						<a href="<?php echo $route . '/' . $link; ?>"><?php echo $link; ?></a>
					</li>
				<?php } ?>
				
			<?php } ?>
			<li>
				<a href="<?php echo $route . '/' . $collection->last; ?>">&raquo;</a>
			</li>
		</ul>	
	</div>
<?php } ?>