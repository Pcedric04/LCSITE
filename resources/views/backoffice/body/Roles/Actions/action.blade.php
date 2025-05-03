<button onclick="showRecord('{{route('labo.back.roles.show',$roles->id)}}')" title="modifier"  class="btn btn-sm btn-outline-primary"><span class="fa fa-recycle"></span></button>
<button onclick="deleteRecordConfirm('{{route('labo.back.roles.delete',$roles->id)}}')" title="supprimer"  class="btn btn-sm btn-outline-danger"><span class="fa fa-trash"></span></button>
<button onclick="statusConfirm('{{route('labo.back.roles.status',$roles->id)}}')" title="Activer/Désactiver"  class="btn btn-sm btn-outline-success"><span class="fa fa-eye"></span></button>
