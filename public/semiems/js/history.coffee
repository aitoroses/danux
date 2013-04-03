# HISTORY STACK FOR WARDROBES

WardrobeModel.history = 
	time: 0
	history: []
	pushToStack: ->
		now = $.extend({}, WardrobeModel.wardrobe)
		@history.push(now)
		@time += 1
		console.log("Wardrobe pushed with time equals #{@time}")
		return @history
	popFromStack: ->
		if time > 0
			WardrobeModel.wardrobe = @history.pop()
			@time -= 1
			console.log("Wardrobe poped, now time is #{@time}")
			return @history

