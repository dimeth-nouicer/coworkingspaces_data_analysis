import sys
import string
import sys, pymongo
#from tweepy import Stream
#from tweepy.streaming import StreamListener
from twitter_client import get_twitter_auth
import json


connection = pymongo.MongoClient("mongodb://localhost")
db=connection.test_database
record1 = db.test_collection
page = open("stream___coworking___Tunisia_startups.jsonl", 'r')
parsed = json.loads(page.read())
record1.insert(parsed)