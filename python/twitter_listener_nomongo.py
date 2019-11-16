#get 10 tweets from timeline
from tweepy import Cursor
import json
import sys, pymongo
from twitter_client import get_twitter_client

if __name__ == '__main__':
  user = sys.argv[1]
  client = get_twitter_client()
  fname = "user_timeline_{}.json".format(user)
  with open(fname, 'w') as f:
    f.write("[")
    for page in Cursor(client.user_timeline, screen_name=user,
      count=200).pages(16):
        for status in page:
          f.write(json.dumps(status._json))
          f.write(","+"\n")
    f.write("]")