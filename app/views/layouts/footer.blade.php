		</div>
	</div>

	<script type="text/javascript" src="/js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="/js/snap.svg.js"></script>

	@if(isset($scripts))
		@foreach ($scripts as $script)
		    <script type="text/javascript" src="{{{ $script }}}"></script>
		@endforeach
	@endif

</body>
</html>