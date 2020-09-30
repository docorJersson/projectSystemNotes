<a href="{{route('personnel.edit',$codeWorker)}}" class="btn bg-blue text-white btn-sm">
    <i class=" fas fa-pen"></i>
</a>
<a href="{{route('personnel.destroyed',$codeWorker)}}" class="btn btn-danger text-white btn-sm"
    onclick="return confirm('¿Seguro que deseas eliminarlo?')">
    <i class="fas fa-trash"></i>
</a>