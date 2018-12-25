package main

import (
	"encoding/json"
)

type UpLoadSomething struct {
	Type   string
	Object interface{}
}
type File struct {
	FileName string
}

type Png struct {
	Wide  int
	Hight int
}

func main(){

	input := `
    {
        "type": "File",
        "object": {
            "filename": "for test"
        }
    }
    `
	var object json.RawMessage
	ss := UpLoadSomething{
		Object: &object,
	}
	if err := json.Unmarshal([]byte(input), &ss); err != nil {
		panic(err)
	}
	switch ss.Type {
	case "File":
		var f File
		if err := json.Unmarshal(object, &f); err != nil {
			panic(err)
		}
		println(f.FileName)
	}
}
