<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h5>Вы действительно хотите удалить данного пользователя?</h5>
      </div>
        <div class="modal-footer text-center">
            <button type="button" class="col btn btn-outline-secondary" data-dismiss="modal"><b>Нет</b></button>
            <form action="{{ route('senior.users.destroy', $user) }}" method="post" class="col pr-0">
                @csrf
                @method('delete')
                <button type="submit" class="col btn btn-outline-danger"><b>Да</b></button>
            </form>
        </div>
    </div>
  </div>
</div>
