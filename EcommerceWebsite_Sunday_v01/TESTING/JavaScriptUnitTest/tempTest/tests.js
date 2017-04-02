
// Test2
QUnit.test("Test Add Keyword and Get Top Keyword", function(assert){
	//Create recommender
	var recommender = new Recommender();

	//Ensure that recommender is in empty state - we don't want anything loaded from memory
	recommender.keywords = {};

	//Add some keywords
	recommender.addKeyword("Fish");
	recommender.addKeyword("Fish");
	recommender.addKeyword("Cat");
	recommender.addKeyword("Cat");
	recommender.addKeyword("Fish");

//Check that we get the correct recommendation
assert.strictEqual(recommender.getTopKeyword(),"Fish");

//Add another two keywords
recommender.addKeyword("Cat");
recommender.addKeyword("Cat");

//Check that we get a different top keyword
assert.strictEqual(recommender.getTopKeyword(), "Cat");
});

	QUnit.test("Test Save please :"), function(assert) {
		//Create recommender and initialize to known state
		var recommender = new Recommender();
		recommender.keywords = {word1: "cat", word2: "fish"};

		//Save state
		recommender.save();

		//Check that the recommender's state has been saved
		assert.deepEqual(JSON.parse(localStorage.recommenderKeywords), recommender.keywords);

	});