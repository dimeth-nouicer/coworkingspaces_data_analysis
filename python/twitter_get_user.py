# Chap02-03/twitter_get_user.py
import os
import sys, pymongo
import json
import time
import math
from tweepy import Cursor
from twitter_client import get_twitter_client

MAX_FRIENDS = 15000

def usage():
    print("Usage:")
    print("python {} <username>".format(sys.argv[0]))

def paginate(items, n):
 """Generate n-sized chunks from items"""
 for i in range(0, len(items), n):
    yield items[i:i+n]

if __name__ == '__main__':
 if len(sys.argv) != 2:
    usage()
    sys.exit(1)
 screen_name = sys.argv[1]
 client = get_twitter_client()
 #dirname = "python/users/{}".format(screen_name)
 """MongoClient = pymongo.MongoClient("mongodb://localhost")
 connexion=MongoClient.admin
 user_collection = "user_{}".format(screen_name)
 max_pages = math.ceil(MAX_FRIENDS / 5000)"""
 try:
    #os.makedirs(user_collection, mode=0o755, exist_ok=True)
    MongoClient = pymongo.MongoClient("mongodb://localhost")
    connexion=MongoClient.admin
    user_collection = "user_{}".format(screen_name)
    max_pages = math.ceil(MAX_FRIENDS / 5000)
 except Exception as e:
    print("Error while creating directory {}".format(user_collection))
    print(e)
    sys.exit(1)


# get followers for a given user

 #fname = "python/users/{}/followers.jsonl".format(screen_name)
 #with open(fname, 'w') as f:
 fname = connexion[user_collection].find()
 for followers in Cursor(client.followers_ids, screen_name=screen_name).pages(max_pages):
        for chunk in paginate(followers, 100):
            users = client.lookup_users(user_ids=chunk)
            for user in users:
                #f.write(json.dumps(user._json)+"\n")
                try:
                    connexion=MongoClient.admin
                    followers_collection = "followers_list_{}".format(screen_name)
                    connexion[followers_collection].insert(user._json)
                except Exception as e:
                    print(e)
        if len(followers) == 5000:
            print("More results available. Sleeping for 60 seconds to avoid rate limit")
            time.sleep(60)


# get friends for a given user
#fname = "python/users/{}/friends.jsonl".format(screen_name)
#with open(fname, 'w') as f:
 for friends in Cursor(client.friends_ids, screen_name=screen_name).pages(max_pages):
    for chunk in paginate(friends, 100):
        users = client.lookup_users(user_ids=chunk)
        for user in users:
            #f.write(json.dumps(user._json)+"\n")
            try:
                    friends_collection = "friends_list_{}".format(screen_name)
                    connexion[friends_collection].insert(user._json)
            except Exception as e:
                    print(e)
    if len(friends) == 5000:
        print("More results available. Sleeping for 60 seconds to avoid rate limit")
        time.sleep(60)

 # get user's profile
 #fname = "python/users/{}/user_profile.json".format(screen_name)
 #with open(fname, 'w') as f:
    profile = client.get_user(screen_name=screen_name)
    #f.write(json.dumps(profile._json, indent=4))
    connexion=MongoClient.admin
    prfile_collection = "profiles"
    connexion[prfile_collection].insert(profile._json)




