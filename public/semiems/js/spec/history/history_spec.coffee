describe 'History', ->
	history = null
	wardrobe = {data: 'data', modules: 'modules'}

	beforeEach ->
		history = new History();

	it 'should save the wardrobe', ->
		history.save(wardrobe)
		expect(history.stack[0]).toEqual wardrobe

	it 'should restore the wardrobe', ->
		history.save(wardrobe)
		popped = history.undo()
		expect(popped).toEqual wardrobe

	it 'when save should increases stack size', ->
		history.save(wardrobe)
		expect(history.get_size()).toBe 1

	it 'when restore should decreases the stack size', ->
		history.save(wardrobe)
		expect(history.get_size()).toBe 1

	it 'get_stack() should return the history', ->
		history.save(wardrobe)
		popped = history.undo()
		expect(history.get_size()).toBe 0