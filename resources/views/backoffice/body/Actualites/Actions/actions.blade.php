<a href="{{route('labo.back.actualites.show',$posts->id)}}" title="Logo article"  class="btn btn-sm btn-outline-warning"><span class="fa fa-image"></span></a>
<a href="{{route('labo.back.actualites.show',$posts->id)}}" title="modifier"  class="btn btn-sm btn-outline-primary"><span class="fa fa-recycle"></span></a>
<button onclick="deleteRecordConfirm('{{route('labo.back.actualites.delete',$posts->id)}}')" title="supprimer"  class="btn btn-sm btn-outline-danger"><span class="fa fa-trash"></span></button>
@permission('posts-status')
<button onclick="statusConfirm('{{route('labo.back.actualites.status',$posts->id)}}')" title="En ligne/Hors ligne"  class="btn btn-sm btn-outline-success"><span class="fa fa-eye"></span></button>
@endpermission
