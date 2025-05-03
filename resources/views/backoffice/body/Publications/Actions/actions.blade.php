<button onclick="showRecord('{{route('labo.back.publications.show',$publications->id)}}')" title="modifier"  class="btn btn-sm btn-outline-primary"><span class="fa fa-recycle"></span></button>
<button onclick="deleteRecordConfirm('{{route('labo.back.publications.delete',$publications->id)}}')" title="supprimer"  class="btn btn-sm btn-outline-danger"><span class="fa fa-trash"></span></button>
<button onclick="statusConfirm('{{route('labo.back.publications.status',$publications->id)}}')" title="En ligne/Hors ligne"  class="btn btn-sm btn-outline-success"><span class="fa fa-eye"></span></button>
