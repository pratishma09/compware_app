<div class="flex justify-between bg-blue mx-10 mt-5 py-5 rounded-lg px-4">
    <p class="text-white text-md py-2 px-2">Dashboard</p>
    <div class="flex flex-end">
        <p class="text-white text-md py-2">Admin</p>
        <form id="logoutForm" method="post" action="{{ route('logout') }}">
            @csrf
            <button type="button" class="text-blue bg-white rounded-md px-2 mx-2 py-2" onclick="submitLogoutForm()">Logout</button>
        </form>
    </div>
</div>

<script>
    function submitLogoutForm() {
        document.getElementById('logoutForm').submit();
    }
</script>
