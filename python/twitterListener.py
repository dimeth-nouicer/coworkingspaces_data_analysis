#get 10 tweets from timeline
from tweepy import Cursor
import json
import sys, pymongo
from twitter_client import get_twitter_client

if __name__ == '__main__':
  user = sys.argv[1]
  client = get_twitter_client()
  #fname = "python/user_timeline_{}.jsonl".format(user)
  #with open(fname, 'w') as f:
  for page in Cursor(client.user_timeline, screen_name=user, count=200).pages(16):
    for status in page: #f.write(json.dumps(status._json)+"\n")
     try:
      MongoClient = pymongo.MongoClient("mongodb://localhost")
      connexion=MongoClient.admin
      tweets_collection = "user_timeline_{}".format(user)
      connexion[tweets_collection].insert(status._json)
      #db = connexion.tweets_collection
      #db.insert(status._json)
     except Exception as e:
      print(e)


#page = open("user_timeline_ELspace_CW.jsonl", 'r')
#parsed = json.loads(page.read())
#record1.insert(parsed)