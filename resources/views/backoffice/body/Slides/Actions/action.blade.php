<a href="{{route('labo.back.slides.show',$slides->id)}}" title="Logo article"  class="btn btn-sm btn-outline-warning"><span class="fa fa-image"></span></a>
<a href="{{route('labo.back.slides.show',$slides->id)}}" title="modifier"  class="btn btn-sm btn-outline-primary"><span class="fa fa-recycle"></span></a>
<button onclick="deleteRecordConfirm('{{route('labo.back.slides.delete',$slides->id)}}')" title="supprimer"  class="btn btn-sm btn-outline-danger"><span class="fa fa-trash"></span></button>
@permission('posts-status')
<button onclick="statusConfirm('{{route('labo.back.slides.status',$slides->id)}}')" title="En ligne/Hors ligne"  class="btn btn-sm btn-outline-success"><span class="fa fa-eye"></span></button>
@endpermission
