
<div class="container mx-auto p-8 bg-white shadow-lg rounded my-10">
    <h2 class="text-3xl font-bold text-center mb-6">Create</h2>

    <form action="liaisons" method="post" style="display: inline; margin-left: auto; margin-right: auto; width: 100%;">
        <div class="mb-4" style="display: inline-block;">
            <label for="depart" class="block text-gray-700">Boarding Quay</label>
            <input type="text" name="Lieu_depart" id="depart" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4" style="display: inline-block;">
            <label for="arrivee" class="block text-gray-700">Arrival Quay</label>
            <input type="text" name="Lieu_arrivee" id="arrivee" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4" style="display: inline-block;">
            <label for="distance" class="block text-gray-700">Travel length</label>
            <input type="number" name="Distance_liaison" id="distance" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700" style="display: inline-block;">Create</button>
    </form>
</div>