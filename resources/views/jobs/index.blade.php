<x-layout>
	<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
		@forelse($jobs as $job) 
			<x-job-card :job="$job">{{$job->title}}</x-job-card>
			@empty
			<p>No Jobs Available</p>
		@endforelse
	</div>
	{{$jobs->links()}}
</x-layout>