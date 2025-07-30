<x-layout>
<h1>{{$title}}</h1>
<ul>
	@forelse($jobs as $job)
		@if ($loop->first)
			<li>First - {{$job}}</li>
		@elseif($loop->last) 
			<li>Last - {{$job}}</li>
		@else
			<li>{{$job}}</li>
		@endif			
		@empty
			<li>No Jobs Available</li>
	@endforelse
	</ul>
</x-layout>