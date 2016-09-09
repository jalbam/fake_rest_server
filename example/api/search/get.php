<?php
	//If there is something to search:
	if ($key !== "")
	{
		http_response_code(200);
		$key = addslashes($key);
		echo
			'
			{
				"result" :
				[
					{ "id" : 0, "subject" : "Title #0 for ' . $key . '", "answer_count" : 45 },
					{ "id" : 221, "subject" : "Title #1 for ' . $key . '", "answer_count" : 145 },
					{ "id" : 2332, "subject" : "Title #2 for ' . $key . '", "answer_count" : 42335 },
					{ "id" : 123, "subject" : "Title #3 for ' . $key . '", "answer_count" : 0 },
					{ "id" : 88730, "subject" : "Title #4 for ' . $key . '", "answer_count" : 1 }
				]
			}';
	}
	//...otherwise, if the client has asked for a list of questions:
	else if (is_numeric($from) && $from >= 0 && is_numeric($size) && $size >= 0 && ($type === "trends" || $type === "question_hot" || $type === "question_new" || $type === "answer_new"))
	{
		http_response_code(200);
		echo
		'{
			"result":
			[
				{
					"create_time": 5136836200000,
					"subject": "瓦力瓦力影评",
					"up_votes": 10,
					"anonymous": true,
					"id": "eouaaadf1",
					"answer_count": 8,
					"views": 69,
					"best_answer":
					{
						"create_time": 8891234567899,
						"anonymous": true,
						"id": "1jkfjaf",
						"type": "TEXT",
						"content": "星级伊娃穿越，阿凡达等都不错"
					}
				},
				{
					"create_time": 5136836271912,
					"subject": "机器人总动员影评",
					"author":
					{
						"name": "大地1",
						"id": "1x7dlsjfj"
					},
					"up_votes": 829,
					"anonymous": false,
					"id": "1afalfa",
					"answer_count": 12,
					"views": 1000,
					"best_answer":
					{
						"answerer":
						{
							"name": "大地2",
							"id": "222dafafafd"
						},
						"create_time": 8891234567899,
						"anonymous": false,
						"id": "1jkfjaf",
						"type": "TEXT",
						"content": "星级伊娃穿越，阿凡达等都不错"
					}
				},
				{
					"create_time": 5136836270000,
					"subject": "机器人总动员影评",
					"up_votes": 1000,
					"anonymous": true,
					"id": "eouaafiw1",
					"answer_count": 14,
					"views": 188,
					"best_answer":
					{
						"create_time": 8891234567899,
						"anonymous": true,
						"id": "1jkfjaf",
						"type": "TEXT",
						"content": "星级伊娃穿越，阿凡达等都不错"
					}
				}
			],
			"total": 3
		}';
	}
	else
	{
		http_response_code(400);
		echo '{ "error" : "Key empty" }';
	}