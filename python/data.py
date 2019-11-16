import facebook, requests, urllib3
import json
import sys, pymongo


token= "EAACEdEose0cBANY9zNxfddXnUY1MJQdhgYaOVdD1ZCg6FuR5SeAQhznkIpmI8UeeS3DsL0woQhXtfHEBOkG13IpzPOuoAZB9XtfZCw4e4dZAQvBzurtqttsImFxWFmEgTy9ErZCnlyVzysXHPQcQhVykrZBISsgazGWpMrXTyK2SdyzgpKnSxlmzmBchbv4BAZD"
#graph = facebook.GraphAPI(access_token=token, version = 2.7)

graph = facebook.GraphAPI(token)
app_id = '1291585530975507' # Obtained from https://developers.facebook.com/
app_secret = 'f7c7e9ef781d938d7762c16047afa91d' # Obtained from https://developers.facebook.com/

# Extend the expiration time of a valid OAuth access token.
#extended_token = graph.extend_access_token(app_id, app_secret)
#print(extended_token) #verify that it expires in 60 days



#events = graph.request("/search?q=Poetry&type=event&limit=10000")
#eventList = events["data"]
#eventid = eventList[1]["id"]
#event1 = graph.get_object(id=eventid,
# fields="attending_count,can_guests_invite,category,cover,declined_count,description,end_time,guest_list_enabled,interested_count,is_canceled,is_page_owned,is_viewer_admin,maybe_count,noreply_count,owner,parent_group,place,ticket_uri,timezone,type,updated_time")
#attenderscount = event1["attending_count"]
#declinerscount = event1["declined_count"]
#interestedcount = event1["interested_count"]
#maybecount = event1["maybe_count"]
#noreplycount = event1["noreply_count"]

#attenders = requests.get("https://graph.facebook.com/v2.12/"+eventid+"/attending?access_token="+token+"&limit="+str(attenderscount)) 
#attenders_json = attenders.json()

#admins = requests.get("https://graph.facebook.com/v2.12/"+eventid+"/admins?access_token="+token)
#admins_json = admins.json()
#Fbpage = graph.request("/elspace.cw")
feed = requests.get("https://graph.facebook.com/v2.7/elspace.cw?fields=id,new_like_count,engagement,posts{shares,type,timeline_visibility,comments},network"+token)
feed_json = feed.json()
with open('FBdata.json', 'w') as outfile:  
    json.dump(feed_json, outfile)




admins = requests.get("https://graph.facebook.com/v2.7/me?fields=id%2Cname%2Cposts%7Bcomments%7D&access_token="+token)

admins_json = admins.json()
#with open('data.txt', 'w') as outfile:  
 #   json.dump(admins_json, outfile)
with open('dataJ.json', 'w') as outfile:  
    json.dump(admins_json, outfile)





connection = pymongo.MongoClient("mongodb://localhost")
db=connection.test_database
record1 = db.test_collection
page = open("dataJ.json", 'r')
parsed = json.loads(page.read())

#for item in parsed["data"]:
record1.insert(parsed)




